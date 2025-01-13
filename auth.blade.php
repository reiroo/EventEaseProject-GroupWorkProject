<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventEase Web Application</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
       .visually-hidden {
      clip: rect(0 0 0 0);
      clip-path: inset(50%);
      height: 1px;
      overflow: hidden;
      position: absolute;
      white-space: nowrap;
      width: 1px;
    }

    /* Auth styles */
    .auth-container {
      background-color: rgba(255, 255, 255, 0.9);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      padding: 62px 62px 314px;
      align-items: center;
    }

    .brand-logo {
      aspect-ratio: 1.7;
      object-fit: contain;
      object-position: center;
      width: 250px;
      max-width: 100%;
    }

    .auth-form {
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      display: flex;
      flex-direction: column;
      padding: 20px;
      width: 100%;
      max-width: 400px;
      margin-top: 20px;
    }

    .auth-form h2 {
      margin-bottom: 20px;
      text-align: center;
    }

    .auth-form input {
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .auth-form button {
      padding: 10px;
      background-color: rgba(142, 36, 170, 0.9);
      border: none;
      color: #fff;
      cursor: pointer;
      border-radius: 5px;
      margin-top: 10px;
    }

    .auth-form button:focus {
      outline: none;
    }

    .toggle-link {
      margin-top: 10px;
      text-align: center;
      cursor: pointer;
      color: #007BFF;
    }

    .google-button {
      background-color: #db4437;
      margin-top: 10px;
    }

    /* Dashboard styles */
    .dashboard-container {
      background-color: rgba(142, 36, 170, 0.9);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .top-header {
      background-color: rgba(245, 245, 245, 1);
      display: flex;
      min-height: 120px;
      align-items: center;
      justify-content: space-between;
      padding: 32px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
    }

    .content-wrapper {
      flex: 1;
      max-width: 1200px;
      width: 100%;
      margin: 24px auto;
      padding: 0 24px;
    }

    .page-title {
      font-size: 48px;
      font-weight: 600;
      text-align: center;
      margin-bottom: 48px;
      color: rgba(245, 245, 245, 1);
    }
    </style>
</head>
<body>
     <!-- Authentication Section -->
  <div id="auth-section" class="auth-container">
    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a529829b74f33cf4986bf16e8d066435c3a8a9390d893c683807b9b6e399c9e7?placeholderIfAbsent=true&apiKey=fd104d424d9c4de09e11d2650596922d" alt="Company Logo" class="brand-logo">

    <div id="signin-form" class="auth-form">
      <h2>Sign In</h2>
      <input type="text" id="signin-username" placeholder="Username" required>
      <input type="password" id="signin-password" placeholder="Password" required>
      <button type="button" onclick="handleSignIn()">Sign In</button>
      <button type="button" class="google-button" onclick="redirectToGoogle()">Sign In with Google</button>
      <div class="toggle-link" onclick="toggleForms()">Don't have an account? Sign Up</div>
    </div>

    <div id="signup-form" class="auth-form" style="display: none;">
      <h2>Sign Up</h2>
      <input type="text" id="signup-username" placeholder="Username" required>
      <input type="email" id="signup-email" placeholder="Email" required>
      <input type="password" id="signup-password" placeholder="Password" required>
      <button type="button" onclick="handleSignUp()">Sign Up</button>
      <button type="button" class="google-button" onclick="redirectToGoogle()">Sign Up with Google</button>
      <div class="toggle-link" onclick="toggleForms()">Already have an account? Sign In</div>
    </div>
  </div>
     <!-- Dashboard Section -->
  <div id="dashboard-section" class="dashboard-container" style="display: none;">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard interface with event management capabilities">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: rgba(142, 36, 170, 0.9);
            --secondary-color: rgba(234, 231, 47, 1);
            --background-color: rgba(245, 245, 245, 1);
            --panel-background: rgba(255, 255, 255, 0.1);
            --shadow-color: rgba(0, 0, 0, 0.25);
            --text-color: rgba(0, 0, 0, 1);
            --spacing-unit: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.5;
            color: var(--text-color);
        }

        .dashboard-container {
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .top-header {
            background-color: var(--background-color);
            display: flex;
            min-height: 120px;
            align-items: center;
            justify-content: space-between;
            padding: calc(var(--spacing-unit) * 4);
            box-shadow: 0 2px 4px var(--shadow-color);
        }

        .logo {
            width: 59px;
            height: auto;
        }

        .profile-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .profile-icon:hover {
            transform: scale(1.05);
        }

        .logout-icon {
            width: 48px;
            height: 48px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .logout-icon:hover {
            transform: scale(1.05);
        }

        .content-wrapper {
            flex: 1;
            max-width: 1200px;
            width: 100%;
            margin: calc(var(--spacing-unit) * 3) auto;
            padding: 0 calc(var(--spacing-unit) * 3);
        }

        .page-title {
            font-size: 48px;
            font-weight: 600;
            text-align: center;
            margin-bottom: calc(var(--spacing-unit) * 6);
            color: var(--background-color);
        }

        .grid-section {
            display: grid;
            gap: calc(var(--spacing-unit) * 3);
            margin-bottom: calc(var(--spacing-unit) * 4);
        }

        .upper-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .lower-grid {
            grid-template-columns: 1fr;
        }

        .panel {
            background-color: var(--panel-background);
            border-radius: calc(var(--spacing-unit));
            padding: calc(var(--spacing-unit) * 3);
            min-height: 200px;
            box-shadow: 0 2px 4px var(--shadow-color);
            width: 100%;
        }

        .lower-panel {
            min-height: 400px;
        }

        .add-button {
            background-color: var(--secondary-color);
            width: 88px;
            height: 88px;
            border-radius: calc(var(--spacing-unit));
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin-top: calc(var(--spacing-unit) * 38);
            box-shadow: 0 4px 4px var(--shadow-color);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px var(--shadow-color);
        }

        .add-button:focus {
            outline: 3px solid var(--background-color);
            outline-offset: 2px;
        }

        .add-button:focus:not(:focus-visible) {
            outline: none;
        }

        .add-icon {
            font-size: 48px;
            font-weight: bold;
            color: var(--text-color);
            line-height: 1;
        }

        .event-list {
            list-style: none;
            padding: 0;
            margin: 20px;
        }

        .event-item {
            background-color: var(--panel-background);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px var(--shadow-color);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .event-item h3 {
            margin-bottom: 10px;
            font-size: 24px;
            color: var(--primary-color);
        }

        .event-item p {
            margin-bottom: 5px;
            font-size: 16px;
            color: var(--text-color);
        }

        .delete-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--secondary-color);
            border: none;
            color: var(--text-color);
            cursor: pointer;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal[aria-hidden="false"] {
            display: flex;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            width: 100%;
        }

        .modal-content h2 {
            margin-bottom: 10px;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
        }

        .modal-content form input,
        .modal-content form textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-content form button {
            padding: 10px;
            background-color: var(--secondary-color);
            border: none;
            color: var(--text-color);
            cursor: pointer;
            border-radius: 5px;
        }

        .modal-content form button:focus {
            outline: none;
        }

        .modal-content .close-button {
            background-color: var(--primary-color);
            margin-top: 10px;
        }

        @media (max-width: 991px) {
            .top-header {
                padding: calc(var(--spacing-unit) * 2);
            }

            .page-title {
                font-size: 40px;
            }

            .grid-section {
                grid-template-columns: 1fr;
            }

            .upper-grid,
            .lower-grid {
                grid-template-columns: 1fr;
            }

            .add-button {
                margin: calc(var(--spacing-unit) * 4) auto;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .add-button,
            .profile-icon,
            .logout-icon {
                transition: none;
            }
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header class="top-header" role="banner">
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1f3329fd0b25884af339e089b371579f273df39b772cd62654f7009dd63a9124?placeholderIfAbsent=true&apiKey=fd104d424d9c4de09e11d2650596922d" class="logo" alt="Company logo" width="59" height="81" loading="lazy" />
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/149b800914276b9e7b6f5501a3dafa6e6ad460bedd7d8b43e3b880418187eed2?placeholderIfAbsent=true&apiKey=fd104d424d9c4de09e11d2650596922d" class="logout-icon" alt="Logout" width="48" height="48" loading="lazy" onclick="handleLogout()" />
        </header>
        
        <main class="content-wrapper" role="main">
            <h1 class="page-title">Dashboard</h1>
        
            <section class="grid-section lower-grid" aria-label="Detailed information">
                <div class="panel lower-panel" role="region" aria-label="Events">
                    <ul class="event-list" id="event-list">
                        <!-- Event items will be added here -->
                    </ul>
                </div>
            </section>
        
            <button class="add-button" aria-label="Add new event" data-el="add-event-button" style="position: fixed; bottom: 20px; right: 20px;">
                <span class="add-icon" aria-hidden="true">+</span>
            </button>

            <div class="modal" id="modal" aria-hidden="true">
                <div class="modal-content">
                    <h2>Add Event</h2>
                    <form id="event-form">
                        <input type="text" id="eventName" placeholder="Event Name" required>
                        <input type="date" id="eventDate" required>
                        <input type="time" id="eventTime" required>
                        <textarea id="eventNotes" placeholder="Notes"></textarea>
                        <input type="color" id="eventColor" value="#ffffff" required>
                        <button type="submit">Add Event</button>
                        <button type="button" class="close-button" id="close-modal-button">Close</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        function toggleForms() {
            const signinForm = document.getElementById('signin-form');
            const signupForm = document.getElementById('signup-form');
            if (signinForm.style.display === 'none') {
                signinForm.style.display = 'flex';
                signupForm.style.display = 'none';
            } else {
                signinForm.style.display = 'none';
                signupForm.style.display = 'flex';
            }
        }

        function handleSignIn() {
    const username = document.getElementById('signin-username').value.trim();
    const password = document.getElementById('signin-password').value.trim();
    if (!username || !password) {
      alert('Please enter both username and password.');
      return;
    }
    // Add your sign-in logic here
    console.log('Sign In:', username, password);
    showDashboard();
  }

  function handleSignUp() {
    const username = document.getElementById('signup-username').value.trim();
    const email = document.getElementById('signup-email').value.trim();
    const password = document.getElementById('signup-password').value.trim();
    if (!username || !email || !password) {
      alert('Please fill in all required fields: username, email, and password.');
      return;
    }
    // Add your sign-up logic here
    console.log('Sign Up:', username, email, password);
    showDashboard();
  }

  function redirectToGoogle() {
    // Add your redirect to Google logic here
    window.location.href = 'https://accounts.google.com/signin';
  }

  function showDashboard() {
    document.getElementById('auth-section').style.display = 'none';
    document.getElementById('dashboard-section').style.display = 'flex';
  }

  function handleLogout() {
    document.getElementById('dashboard-section').style.display = 'none';
    document.getElementById('auth-section').style.display = 'flex';
  }

        (() => {
            const state = {
                navigateToAddEvent() {
                    const modal = document.getElementById('modal');
                    modal.setAttribute('aria-hidden', 'false');
                },
                closeModal() {
                    const modal = document.getElementById('modal');
                    modal.setAttribute('aria-hidden', 'true');
                },
                deleteEvent(eventId) {
                    let events = JSON.parse(localStorage.getItem('events')) || [];
                    events = events.filter(event => event.id !== eventId);
                    localStorage.setItem('events', JSON.stringify(events));
                    displayEvents();
                }
            };

            function handleAddEventClick() {
                state.navigateToAddEvent();
            }

            function handleAddEventKeydown(event) {
                if (event.key === "Enter" || event.key === " ") {
                    event.preventDefault();
                    state.navigateToAddEvent();
                }
            }

            function handleFormSubmit(event) {
                event.preventDefault();

                const formData = {
                    id: Date.now().toString(),
                    eventName: document.getElementById('eventName').value.trim(),
                    notes: document.getElementById('eventNotes').value.trim(),
                    date: document.getElementById('eventDate').value,
                    time: document.getElementById('eventTime').value,
                    color: document.getElementById('eventColor').value
                };

                if (!formData.eventName || !formData.date || !formData.time || !formData.color) {
                    alert('Please fill in all required fields');
                    return;
                }

                // Store the event data in localStorage
                const events = JSON.parse(localStorage.getItem('events')) || [];
                events.push(formData);
                localStorage.setItem('events', JSON.stringify(events));

                state.closeModal();
                displayEvents();
            }

            function displayEvents() {
                const eventList = document.getElementById('event-list');
                eventList.innerHTML = '';
                const events = JSON.parse(localStorage.getItem('events')) || [];

                // Sort events by date and time
                events.sort((a, b) => {
                    const dateA = new Date(`${a.date}T${a.time}`);
                    const dateB = new Date(`${b.date}T${b.time}`);
                    return dateA - dateB;
                });

                // Display events
                events.forEach(event => {
                    const eventItem = document.createElement('li');
                    eventItem.className = 'event-item';
                    eventItem.dataset.eventId = event.id;
                    eventItem.style.backgroundColor = event.color;
                    eventItem.innerHTML = `
                        <h3>${event.eventName}</h3>
                        <p>Date: ${event.date}</p>
                        <p>Time: ${event.time}</p>
                        <p>Notes: ${event.notes || 'No notes added'}</p>
                        <button class="delete-button" aria-label="Delete event">Delete</button>
                    `;
                    eventItem.querySelector('.delete-button').addEventListener('click', (e) => {
                        e.stopPropagation();
                        state.deleteEvent(event.id);
                    });
                    eventList.appendChild(eventItem);
                });
            }

            function initialize() {
                const addEventButton = document.querySelector('[data-el="add-event-button"]');
                if (addEventButton) {
                    addEventButton.addEventListener("click", handleAddEventClick);
                    addEventButton.addEventListener("keydown", handleAddEventKeydown);
                }

                const eventForm = document.getElementById('event-form');
                if (eventForm) {
                    eventForm.addEventListener('submit', handleFormSubmit);
                }

                const closeModalButton = document.getElementById('close-modal-button');
                if (closeModalButton) {
                    closeModalButton.addEventListener('click', state.closeModal);
                }

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        state.closeModal();
                    }
                });

                displayEvents();
            }

            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", initialize);
            } else {
                initialize();
            }
        })();
    </script>
</body>
</html>
  </div>

  <script>
    // Authentication Functions
    function toggleForms() {
      const signinForm = document.getElementById('signin-form');
      const signupForm = document.getElementById('signup-form');
      signinForm.style.display = signinForm.style.display === 'none' ? 'flex' : 'none';
      signupForm.style.display = signupForm.style.display === 'none' ? 'flex' : 'none';
    }

    function handleSignIn() {
      document.getElementById('auth-section').style.display = 'none';
      document.getElementById('dashboard-section').style.display = 'flex';
      displayEvents();
    }

    function handleSignUp() {
      document.getElementById('auth-section').style.display = 'none';
      document.getElementById('dashboard-section').style.display = 'flex';
      displayEvents();
    }

    function redirectToGoogle() {
      window.location.href = 'https://accounts.google.com/signin';
    }

    // Dashboard Functions
    function displayEvents() {
      const eventList = document.getElementById('event-list');
      if (eventList) {
        eventList.innerHTML = 'Loading events...';
        // Load and display events from localStorage or server
      }
    }

    function handleAddEvent() {
      alert('Add Event button clicked');
    }
  </script>
</body>
</html>
