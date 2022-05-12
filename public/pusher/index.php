<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('b5f2ab48ecc255bcb907', {
      cluster: 'mt1'
    });

    
    var channel = pusher.subscribe('status-liked');
    channel.bind("App\\Events\\StatusLiked", (data) => {
      // Method to be dispatched on trigger.
        console.log(data);
    });
    
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>