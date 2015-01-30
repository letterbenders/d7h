$(document).ready(function(){


//Equal height for grid__item__content

    setHeight('.grid__item__content');
    // Masonry

    var container = document.querySelector('.masonry');
    var selection = document.querySelector('.masonry') !== null;

    if (selection) {
        // initialize Masonry
        var msnry = new Masonry( container );

        imagesLoaded( container, function() {
            // layout Masonry again after all images have loaded
            msnry.layout();
        });
    } 

});


window.onresize = function() {
     setHeight('.grid__item__content');
};


function setHeight(column) {
var maxHeight = 0;
    //Get all the element with class = case-content
    column = $(column);
    //Loop all the column
    column.each(function() {
		$(this).height('auto');
        //Store the highest value
        if($(this).height() > maxHeight) {
            maxHeight = $(this).height();
        }
    });
    //Set the height
    column.height(maxHeight);
}