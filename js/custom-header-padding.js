document.addEventListener('DOMContentLoaded', function() {
    function adjustMainPadding() {
        let header = document.querySelector('#masthead');
        let mainContent = document.querySelector('#primary'); // Change selector if necessary
        if (header && mainContent) {
            let headerHeight = header.offsetHeight;
            mainContent.style.paddingTop = headerHeight * 1.1 + 'px';
        }
    }

    // Initial adjustment
    adjustMainPadding();

    // Adjust on window resize to account for changes in header size
    window.addEventListener('resize', adjustMainPadding);
});
