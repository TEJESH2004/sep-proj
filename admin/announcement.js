const announcementTitleDisplay = document.getElementById('announcementTitleDisplay');
const announcementContentDisplay = document.getElementById('announcementContentDisplay');

document.getElementById("adminForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const title = document.getElementById("announcementTitle").value;
    const content = document.getElementById("announcementContent").value;
    
    if (title && content) {
        window.localStorage.setItem('announcementTitle', title);
        window.localStorage.setItem('announcementContent', content);

        announcementTitleDisplay.textContent = title;
        announcementContentDisplay.textContent = content;

        alert("Announcement posted successfully!");
    } else {
        alert("Please fill in both title and content.");
    }
});

const announcementTitle = window.localStorage.getItem('announcementTitle');
const announcementContent = window.localStorage.getItem('announcementContent');

if (announcementTitle && announcementContent) {
    announcementTitleDisplay.textContent = announcementTitle;
    announcementContentDisplay.textContent = announcementContent;
} else {
    announcementTitleDisplay.textContent = "No announcement available.";
}
