document.addEventListener("DOMContentLoaded", function () {
  fetchNotifications();

  document
    .getElementById("notificationBell")
    .addEventListener("click", function () {
      markNotificationsAsRead();
    });
});

function fetchNotifications() {
  fetch("fetch_notifications.php")
    .then((response) => response.json())
    .then((data) => {
      let notificationList = document.getElementById("notificationList");
      let badge = document.querySelector(".badge-number");
      let countText = document.getElementById("notificationCountText");

      notificationList.innerHTML = "";

      if (data.length === 0) {
        badge.style.display = "none";
        notificationList.innerHTML = `
    <li class="dropdown-header">
        No new notifications
    </li>
    <li><hr class="dropdown-divider"></li>
    <li class="dropdown-footer">
        <a href="#">Show all notifications</a>
    </li>
`;
      } else {
        badge.style.display = "inline-block";
        badge.textContent = data.length;
        countText.textContent = `You have ${data.length} new notifications`;

        notificationList.innerHTML = `
    <li class="dropdown-header">
        You have ${data.length} new notifications
        <a href="feed"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
    </li>
    <li><hr class="dropdown-divider"></li>
`;

        let baseURL = "/SJNHSAlumniSystem/admin/"; // Change this to your actual domain

        data.forEach((event) => {
          let eventImage = event.eventPicture
            ? `${baseURL}${event.eventPicture}`
            : `${baseURL}default-image.jpg`;
          let formattedDate = formatDate(event.eventDate);

          notificationList.innerHTML += `
            <li class="notification-item d-flex align-items-center">
                <img src="${eventImage}" alt="${event.eventName}" class="rounded-circle me-3" width="40" height="40">
                <div>
                    <h4>${event.eventName}</h4>
                    <p>${formattedDate}</p>
                </div>
            </li>
            <li><hr class="dropdown-divider"></li>
        `;
        });

        notificationList.innerHTML += `
    <li class="dropdown-footer">
        <a href="feed">Show all notifications</a>
    </li>
`;
      }
    });
}

// Function to format the event date into a readable format
function formatDate(dateString) {
  let date = new Date(dateString);
  let options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
    hour: "2-digit",
    minute: "2-digit",
    hour12: true,
  };
  return date.toLocaleDateString("en-US", options);
}

function markNotificationsAsRead() {
  document.querySelector(".badge-number").style.display = "none";
}
document.addEventListener("DOMContentLoaded", function () {
  fetchMessages();
});

function fetchMessages() {
  fetch("fetch_messages.php") // Fetch messages from PHP
    .then((response) => response.json())
    .then((data) => {
      let messageList = document.getElementById("messageList");
      let badge = document.getElementById("messageBadge");
      let countText = document.getElementById("messageCountText");

      messageList.innerHTML = ""; // Clear existing messages

      if (data.length === 0) {
        badge.style.display = "none"; // Hide badge if no messages
        messageList.innerHTML = `
                    <li class="dropdown-header">
                        No new messages
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>
                `;
      } else {
        badge.style.display = "inline-block"; // Show badge
        badge.textContent = data.length; // Update count
        countText.textContent = `You have ${data.length} new messages`;

        messageList.innerHTML = `
                    <li class="dropdown-header">
                        You have ${data.length} new messages
                        <a href="chat.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                `;

        data.forEach((message) => {
          let senderImage = message.profile_picture
            ? `${message.profile_picture}`
            : "default-user.jpg";
          let formattedDate = formatDate(message.timestamp); // Format date

          messageList.innerHTML += `
                        <li class="message-item">
                            <a href="#">
                                <img src="${senderImage}" alt="${message.sender_name}" class="rounded-circle me-3" width="40" height="40">
                                <div>
                                    <h4>${message.sender_name}</h4>
                                    <p>${message.msg_content}</p>
                                    <p>${formattedDate}</p>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                    `;
        });

        messageList.innerHTML += `
                    <li class="dropdown-footer">
                        <a href="chat.php">Show all messages</a>
                    </li>
                `;
      }
    })
    .catch((error) => console.error("Error fetching messages:", error));
}

// Function to format timestamp into a readable date
function formatDate(dateString) {
  let date = new Date(dateString);
  let options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
    hour: "2-digit",
    minute: "2-digit",
    hour12: true,
  };
  return date.toLocaleDateString("en-US", options);
}
