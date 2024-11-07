<?php

function printBackButton(){
    $previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'default_page.php';
    
    echo '<button onclick="window.location.href=\'' . $previousPage . '\' " class="backbutton">Go Back</button>';

    echo '
<style>
    .backbutton{
        border: none;
        background-color: transparent;
    }
    .backbutton:hover{
        background-color: transparent;
    }

</style>';
}
//this always goes back. we need it to go up absolutely!!!
//TODO fix back button!

function resizeTextOnOverflow($className) {
    echo "
<script>
    const adjustFontSize = () => {
        const divs = document.querySelectorAll('.$className');

        divs.forEach(div => {
            const containerHeight = div.clientHeight;
            const containerWidth = div.clientWidth;

            const minFontSize = Math.max(10, containerHeight * 0.1); // Minimum 10px or 10% of height
            const maxFontSize = Math.min(100, containerHeight * 0.8); // Maximum 100px or 80% of height
            
            // Start from maxFontSize and work down
            let fontSize = maxFontSize;

            // Create a temporary element to measure text size
            const tempSpan = document.createElement('span');
            tempSpan.style.visibility = 'hidden'; // Hide it from view
            document.body.appendChild(tempSpan);
            
            do {
                // Set font size in the temporary span
                tempSpan.style.fontSize = fontSize + 'px';
                tempSpan.innerText = div.innerText; // Use the same text as the div
                
                // Check dimensions
                const tempWidth = tempSpan.offsetWidth;
                const tempHeight = tempSpan.offsetHeight;

                // If it fits, apply the size to the div
                if (tempWidth <= containerWidth && tempHeight <= containerHeight) {
                    div.style.fontSize = fontSize + 'px';
                    break;
                }

                fontSize -= 1; // Decrease font size
            } while (fontSize >= minFontSize);
            
            // Clean up temporary element
            document.body.removeChild(tempSpan);
        });
    };

    document.addEventListener('DOMContentLoaded', adjustFontSize);
    window.addEventListener('resize', adjustFontSize);
</script>
";
}





?> 
