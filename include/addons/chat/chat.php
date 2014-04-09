    var $users = $('#users ul');
    var $chatOutput = $('#chat div');
    var $chatInput = $('#chat input');
    var $messagesOutput = $('#messages div');
    var $messagesInput = $('#messages input');
    var target = 0;


    socket.on('listing', function (data) {
      console.log('listing:', data);
      window.users = data;
      target = 0;
      $users.empty();
      $.each(data, function (index, user) {
        console.log(arguments);
        $users.append('<li>' + user);
      });
      $users.find('li:first').addClass('selected');
    });
    socket.on('chat', function (message) {
       console.log('chat:', message);
       $chatOutput.append('<div>' + message);
    });
    socket.on('message', function (message) {
       console.log('message', message);
       $messagesOutput.append('<div>' + message);
    });
    
    function chat (message) {
      socket.emit('chat', message);
    }
    function message (user, message) {
      socket.emit('message', {
        user: user,
        message: message
      });
    }

    $('#chat form').submit(function (event) {
      event.preventDefault();
      chat($chatInput.val());
      $chatInput.val('');
    });

    $('#messages form').submit(function (event) {
      event.preventDefault();
      message(users[target], $messagesInput.val());
      $messagesInput.val('');
    });

    $users.on('click', 'li', function (event) {
      var $user = $(this);
      target = $user.index();
      $users.find('li').removeClass('selected');
      $user.addClass('selected');

    });
  });
jQuery('body').prepend('<style>.selected {color: blue;}</style><section id='users'><h1>Users:</h1><ul></ul></section><section id='chat'><h1>Chat:</h1><div></div><form><input><button>submit</buttom></form></section><section id='messages'> <h1>Messages:</h1><div></div><form><input><button>submit</buttom></form></section>');