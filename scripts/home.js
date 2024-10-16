let index = ['/prac/images/Designer.jpeg','/prac/images/Designer-2.jpeg', '/prac/images/Designer-3.jpeg', '/prac/images/Designer-4.jpeg','/prac/images/Designer-5.jpeg'];
let nowIndex = 0;
let content = document.getElementById('slider');

if (content) { // Ensure the element exists
    function slider() {
        nowIndex++;
        if (nowIndex >= index.length) {
            nowIndex = 0; // Reset index if it exceeds array length
        }
        content.src = index[nowIndex]; // Update the image source
    }
    setInterval(slider, 3000); // Change image every 3 seconds
} else {
    console.error('Element with ID "slider" not found.');
}