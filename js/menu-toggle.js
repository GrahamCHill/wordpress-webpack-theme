jQuery(document).ready(function($) {
    // Toggle the burger menu when the burger icon is clicked
    $('.navbar-toggler').click(function() {
        $(this).toggleClass('collapsed'); // Toggle the class to indicate state
        $('#navbarNav').toggleClass('show'); // Directly toggle the visibility class on the navbar
    });

    // Close the menu when clicking outside of it, but exclude clicks inside the navbar or search input
    $(document).click(function(event) {
        var clickover = $(event.target);
        var navbarCollapse = $('#navbarNav');
        var isOpen = navbarCollapse.hasClass('show'); // Check if the menu is open

        // Exclude clicks inside the navbar and on specific elements like the search bar
        if (isOpen && !clickover.closest('.navbar').length && !clickover.closest('.search-input').length) {
            // If the menu is open and the click was outside the menu (and not the search), collapse it
            $('.navbar-toggler').removeClass('collapsed'); // Remove collapsed state from the toggle button
            navbarCollapse.removeClass('show'); // Close the navbar
        }
    });
});
