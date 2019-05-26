// select all elements from this point up
function selectorSAEFTPU(element, elements) {
  elements.push(element);
  if (element.parentElement) {
    return selectorSAEFTPU(element.parentElement, elements)
  } else {
    return elements;
  }
}
// get element from elements line by class with in specific class
function selectorGEFELBCWISC(elementsLine, elementClass, parentClass) {
  return elementsLine.find((parent) => parent.classList.contains(elementClass) && selectorSAEFTPU(parent, []).find((parent) => parent.classList.contains(parentClass)));
}