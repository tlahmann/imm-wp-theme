/**
 * Based on: https://www.w3schools.com/howto/howto_js_portfolio_filter.asp
 * @author https://www.w3schools.com
 * @author Tobias Lahmann
 */
filterSelection("all") // Execute the function and show all columns
function filterSelection (category) {
    const x = document.getElementsByClassName("masonry-project");
    if (category == "all") {category = "";}
    // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
    for (let i = 0; i < x.length; i++) {
        immRemoveClass(x[i], "show");
        if (x[i].className.indexOf(category) > -1) {
            immAddClass(x[i], "show");
        }
    }
}

// Show filtered elements
function immAddClass (element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

// Hide elements that are not selected
function immRemoveClass (element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
// var btnContainer = document.getElementById("myBtnContainer");
// var btns = btnContainer.getElementsByClassName("btn");
// for (var i = 0; i < btns.length; i++) {
//     btns[i].addEventListener("click", function () {
//         var current = document.getElementsByClassName("active");
//         current[0].className = current[0].className.replace(" active", "");
//         this.className += " active";
//     });
// }
