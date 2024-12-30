
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/main.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.global.min.js"></script>
</head>
<body>
    <h1>Event Calendar</h1>
    <div id="calendar"></div>

    <form id="eventForm" style="display: none;">
        <label>Title: <input type="text" id="title" required></label><br>
        <label>Description: <textarea id="description"></textarea></label><br>
        <label>Start Date: <input type="date" id="start_date" required></label><br>
        <label>End Date: <input type="date" id="end_date" required></label><br>
        <button type="button" onclick="addEvent()">Add Event</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                events: '/calendar/events',
                dateClick: function (info) {
                    document.getElementById('eventForm').style.display = 'block';
                    document.getElementById('start_date').value = info.dateStr;
                    document.getElementById('end_date').value = info.dateStr;
                },
            });
            calendar.render();
        });

        function addEvent() {
            const data = {
                title: document.getElementById('title').value,
                description: document.getElementById('description').value,
                start_date: document.getElementById('start_date').value,
                end_date: document.getElementById('end_date').value,
            };

            fetch('/calendar/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(result => {
                    if (result.status === 'success') {
                        alert('Event added successfully!');
                        window.location.reload();
                    }
                });
        }
    </script>
</body>
</html>
