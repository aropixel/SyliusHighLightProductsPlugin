const addProductsToHighlight = () => {

    // Get the collection
    const collection = document.querySelector('.js-highlight-product-collection');

    // Get the collection
    const collectionList = document.querySelector('.js-highlight-product-collection [data-form-collection="list"]');

    // Get the products to add
    const selectedProducts = document.querySelectorAll('.js-highlight-product-selector a.visible');

    // Get the prototype of a new line
    const prototype = collection.getAttribute('data-prototype');

    // Get the prototype of a new line
    const indexInit = document.querySelectorAll('.js-highlight-product-collection [data-form-collection="item"]').length;

    selectedProducts.forEach((selectedProduct, index) => {

        // Get the produt's code
        const selectProductCode = selectedProduct.getAttribute('data-value');

        // Guess new position
        const position = indexInit + index;

        // Set position in the aropixel_highlight[highLightProducts] array
        let selectedProductPrototype = prototype.replace(/__name__/g, position);
        selectedProductPrototype = selectedProductPrototype.replace(`<option value="${selectProductCode}">`, `<option selected="selected" value="${selectProductCode}">`);

        // Add the line to the collection
        collectionList.innerHTML += selectedProductPrototype;
    });


    // Update position field
    const collectionElements = document.querySelectorAll('.draggable');
    collectionElements.forEach((element, index) => {
        element.querySelector('.highlight-product-form-item-position').value = index + 1;
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

    dragEl.querySelector('.highlight-product-form-item-position').value = dragElPos + 1;
    elementDragged.querySelector('.highlight-product-form-item-position').value = elementDraggedPos + 1;
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
