const addProductsToHighlight = () => {
    const collection = document.querySelector('.js-highlight-product-collection');
    const selectedProducts = document.querySelectorAll('.js-highlight-product-selector a.visible');

    selectedProducts.forEach((selectedProduct, index) => {
        const prototype = collection.getAttribute('data-prototype');
        const selectProductCode = selectedProduct.getAttribute('data-value');

        const position = index + 1;

        let selectedProductPrototype = prototype.replace(/__name__/g, position);
        selectedProductPrototype = selectedProductPrototype.replace(`<option value="${selectProductCode}">`, `<option selected="selected" value="${selectProductCode}">`);

        collection.innerHTML += selectedProductPrototype;
    });

    const collectionElements = document.querySelectorAll('.draggable');

    collectionElements.forEach((element) => {
        const parent = element.parentNode;
        const positionElement = Array.prototype.indexOf.call(parent.children, element);
        element.querySelector('.highlight-product-form-item-position').value = positionElement;
    });

    initDragHighlightProduct();
};

const initAddProductsToHighlightOnClick = () => {
    const productAddBtn = document.querySelector('.js-highlight-product-add');

    productAddBtn.addEventListener('click', (event) => {
        event.preventDefault();
        addProductsToHighlight();
    });
};

const handleDragStart = (dragEl, e) => {
    dragEl.style.opacity = '0.4';
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text', e.target.id);
};

const handleDragOver = (dragEl, e) => {
    if (e.preventDefault) {
        e.preventDefault();
    }
    dragEl.classList.add('over');
    e.dataTransfer.dropEffect = 'move';
};

const handleDragLeave = (dragEl) => {
    dragEl.classList.remove('over');
};

const handleDragDrop = (dragEl, e) => {
    if (e.stopPropagation) {
        e.stopPropagation();
    }
    const parent = dragEl.parentNode;
    const elementDraggedId = e.dataTransfer.getData('text');
    const elementDragged = document.getElementById(elementDraggedId);
    const dragElHtml = dragEl.innerHTML;

    // element dragged
    dragEl.innerHTML = elementDragged.innerHTML;

    // element original
    elementDragged.innerHTML = dragElHtml;

    const dragElPos = Array.prototype.indexOf.call(parent.children, dragEl);
    const elementDraggedPos = Array.prototype.indexOf.call(parent.children, elementDragged);

    dragEl.querySelector('.highlight-product-form-item-position').value = dragElPos;
    elementDragged.querySelector('.highlight-product-form-item-position').value = elementDraggedPos;
};

const handleDragEnd = (dragEl, draggableElements) => {
    dragEl.style.opacity = '1';

    draggableElements.forEach((el) => {
        el.classList.remove('over');
    });
};

const initDragHighlightProduct = () => {
    const draggableElements = document.querySelectorAll('.draggable');

    draggableElements.forEach((dragEl) => {
        dragEl.addEventListener('dragstart', (e) => {
            handleDragStart(dragEl, e);
        });

        dragEl.addEventListener('dragover', (e) => {
            handleDragOver(dragEl, e);
        });

        dragEl.addEventListener('dragleave', () => {
            handleDragLeave(dragEl);
        });

        dragEl.addEventListener('drop', (e) => {
            handleDragDrop(dragEl, e);
        });

        dragEl.addEventListener('dragend', () => {
            handleDragEnd(dragEl, draggableElements);
        });
    });
};

window.addEventListener('DOMContentLoaded', () => {
    initAddProductsToHighlightOnClick();
    initDragHighlightProduct();
});
