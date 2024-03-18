// User data array (for demo purpose)
let users = [];

// Function to add a user
function addUser(username, email) {
  users.push({ username, email });
  updateUserList();
}

// Function to update user list
function updateUserList() {
  const userList = document.getElementById("userList");
  userList.innerHTML = "";
  users.forEach((user) => {
    const userItem = document.createElement("div");
    userItem.innerHTML = `<p><strong>Username:</strong> ${user.username}, <strong>Email:</strong> ${user.email}</p>`;
    userList.appendChild(userItem);
  });
}

// Add user button functionality
document.getElementById("addUserButton").addEventListener("click", () => {
  // Redirect to another page or perform add user action
  console.log("Redirecting to add user page...");
});

// Function to handle form submission
document
  .getElementById("userForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    addUser(username, email);
    document.getElementById("userForm").reset();
  });

// Function to add user and update user list
function addUser(username, email) {
  const userList = document.getElementById("userList");
  const userItem = document.createElement("p");
  userItem.textContent = `Username: ${username}, Email: ${email}`;
  userList.appendChild(userItem);
}

// Add user form submission
const addUserForm = document.getElementById("userForm");
addUserForm.addEventListener("submit", function (event) {
  event.preventDefault();
  const username = document.getElementById("username").value;
  const email = document.getElementById("email").value;
  addUser(username, email);
  addUserForm.reset();
});

// Initialize with some dummy users (for demo purpose)
addUser("JohnDoe", "johndoe@example.com");
addUser("JaneSmith", "janesmith@example.com");

// Program management functions
const createProgramBtn = document.getElementById("createProgramBtn");
const updateProgramBtn = document.getElementById("updateProgramBtn");
const partnershipsBtn = document.getElementById("partnershipsBtn");
const sessionSchedulesBtn = document.getElementById("sessionSchedulesBtn");

// Function to handle hover effect
function handleHover(btn, action) {
  btn.addEventListener("mouseover", () => {
    btn.style.backgroundColor = action === "enter" ? "#ccc" : "#f0f0f0";
  });
  btn.addEventListener("mouseout", () => {
    btn.style.backgroundColor = action === "enter" ? "#f0f0f0" : "transparent";
  });
}

// Add hover effect to buttons
handleHover(createProgramBtn, "enter");
handleHover(updateProgramBtn, "enter");
handleHover(partnershipsBtn, "enter");
handleHover(sessionSchedulesBtn, "enter");

// Functionality for each button (dummy function for demo purpose)
createProgramBtn.addEventListener("click", () => {
  console.log("Create program functionality");
});

updateProgramBtn.addEventListener("click", () => {
  console.log("Update program functionality");
});

partnershipsBtn.addEventListener("click", () => {
  console.log("Coaching institute partnerships functionality");
});

sessionSchedulesBtn.addEventListener("click", () => {
  console.log("Session schedules functionality");
});

// Volunteer coordination functions
const onboardVolunteersBtn = document.getElementById("onboardVolunteersBtn");
const assignTasksBtn = document.getElementById("assignTasksBtn");
const monitorPerformanceBtn = document.getElementById("monitorPerformanceBtn");

// Functionality for each button (dummy function for demo purpose)
onboardVolunteersBtn.addEventListener("click", () => {
  console.log("Onboard new volunteers functionality");
});

assignTasksBtn.addEventListener("click", () => {
  console.log("Assign tasks functionality");
});

monitorPerformanceBtn.addEventListener("click", () => {
  console.log("Monitor performance functionality");
});

// Documentation and recognition functions
const generateCertificateBtn = document.getElementById(
  "generateCertificateBtn"
);

// Functionality to generate certificate
generateCertificateBtn.addEventListener("click", () => {
  // Call function to generate certificate (dummy function for demo purpose)
  generateCertificate();
});

// Function to generate certificate (dummy function for demo purpose)
function generateCertificate() {
  // Dummy logic to generate certificate
  alert("Certificate generated successfully!");
}

// Function to handle redirect to user management adding page
function redirectToUserManagementAddingPage() {
  // Redirect to the user management adding page
  window.location.href = "user-management.html";
}

// Add event listener to the button in the admin panel page
document
  .getElementById("userManagementButton")
  .addEventListener("click", redirectToUserManagementAddingPage);
