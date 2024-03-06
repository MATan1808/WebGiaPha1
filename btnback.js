document.getElementById("backButton").addEventListener("click", function() {
    goBack();
});

function goBack() {
    if (document.referrer) {
        window.location.href = document.referrer;
    } else {
        // If there is no referrer, you can redirect to a default page or home page
        window.location.href = "Trangchu.html";
    }
}
