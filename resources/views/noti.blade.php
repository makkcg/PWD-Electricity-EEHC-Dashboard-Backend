<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- Here is the pusher scripts --}}

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>

      // Enable pusher logging - don't include this in production
       Pusher.logToConsole = true;

     var pusher = new Pusher('bf6a132107f4212df7d3', {
        cluster: 'mt1'
      });
      var channel = pusher.subscribe('chat17');

      channel.bind('messageEvent', function (data) {

          console.log(data.data);
        });

      // apenned pusher result

    //   var notificationsWrapper = $('.dropdown-notifications');
    //   var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    //   var notificationsCountElem = notificationsToggle.find('span[data-count]');
    //   var notificationsCount = parseInt(notificationsCountElem.data('count'));
    //   var notifications = notificationsWrapper.find('li.scrollable-container');




    </script>
</body>
</html>
