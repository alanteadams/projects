$(document)
  .on('submit', 'form.js-add-page', function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $('.js-error', _form);

    var dataObj = {
      title: $("input[name='title']", _form).val(),
      category: $("select[name='category']", _form).val(),
      description: $("textarea[name='description']", _form).val(),
      content: $("textarea[name='content']", _form).val()
    };

    console.log(dataObj);

    $.ajax({
      type: 'POST',
      url: 'ajax/add_page.php',
      data: dataObj,
      dataType: 'json',
      async: true
    })
      .done(function ajaxDone(data) {
        // Whatever data is
        if (data.redirect !== undefined) {
          window.location = data.redirect;
        } else if (data.error !== undefined) {
          _error.text(data.error).show();
        }
      })
      .fail(function ajaxFailed(e) {
        // This failed
        console.log('I failed: add page');
      })
      .always(function ajaxAlwaysDoThis(data) {
        // Always do
        console.log('Always');
      });

    return false;
  })

  .on('submit', 'form.js-add-notes', function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $('.js-error', _form);

    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    let id = urlParams.get('id');

    console.log(id);

    var dataObj = {
      notes: $("textarea[name='notes']", _form).val(),
      id: id
    };

    console.log(dataObj);

    $.ajax({
      type: 'POST',
      url: 'ajax/add_notes.php',
      data: dataObj,
      dataType: 'json',
      async: true
    })
      .done(function ajaxDone(data) {
        // Whatever data is
        if (data.success) {
        } else if (data.error !== undefined) {
          _error.text(data.error).show();
        }
      })
      .fail(function ajaxFailed(e) {
        // This failed
        console.log('I failed: add notes');
      })
      .always(function ajaxAlwaysDoThis(data) {
        // Always do
        console.log('Always');
      });

    return false;
  })

  .on('submit', 'form.js-register', function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $('.js-error', _form);

    var dataObj = {
      email: $("input[type='email']", _form).val(),
      password: $("input[type='password']", _form).val(),
      passwordtwo: $("input[name='password-two']", _form).val(),
      username: $("input[name='username']", _form).val(),
      firstname: $("input[name='first-name']", _form).val(),
      lastname: $("input[name='last-name']", _form).val()
    };

    if (dataObj.email.length < 6) {
      _error.text('Please enter a valid email address').show();
      return false;
    } else if (dataObj.password.length < 2) {
      _error
        .text('Please enter a passphrase that is at least 11 characters long.')
        .show();
      return false;
    }

    console.log(dataObj);
    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

    $.ajax({
      type: 'POST',
      url: 'ajax/register.php',
      data: dataObj,
      dataType: 'json',
      async: true
    })
      .done(function ajaxDone(data) {
        // Whatever data is
        if (data.redirect !== undefined) {
          window.location = data.redirect;
        } else if (data.error !== undefined) {
          _error.text(data.error).show();
        }
      })
      .fail(function ajaxFailed(e) {
        // This failed
        console.log('I failed: register');
      })
      .always(function ajaxAlwaysDoThis(data) {
        // Always do
        console.log('Always');
      });

    return false;
  })

  .on('submit', 'form.js-change-password', function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $('.js-error', _form);

    var dataObj = {
      passwordCurrent: $("input[name='current-password']", _form).val(),
      passwordNew: $("input[name='password-new']", _form).val(),
      passwordConfirm: $("input[name='password-confirm']", _form).val()
    };

    if (dataObj.passwordNew.length < 2) {
      _error
        .text('Please enter a passphrase that is at least 11 characters long')
        .show();
      return false;
    } else if (dataObj.passwordConfirm.length < 2) {
      _error
        .text(
          'Please enter a confirm password that is at least 11 characters long'
        )
        .show();
      return false;
    }

    console.log(dataObj);
    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

    $.ajax({
      type: 'POST',
      url: 'ajax/change_password.php',
      data: dataObj,
      dataType: 'json',
      async: true
    })
      .done(function ajaxDone(data) {
        // Whatever data is
        if (data.redirect !== undefined) {
          window.location = data.redirect;
        } else if (data.error !== undefined) {
          _error.text(data.error).show();
        }
      })
      .fail(function ajaxFailed(e) {
        // This failed
        console.log('I failed: change password');
      })
      .always(function ajaxAlwaysDoThis(data) {
        // Always do
        console.log('Always');
      });

    return false;
  })

  .on('submit', 'form.js-login', function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $('.js-error', _form);

    var dataObj = {
      emailLogin: $("input[name='email-login']", _form).val(),
      passwordLogin: $("input[name='password-login']", _form).val()
    };

    if (dataObj.emailLogin.length < 6) {
      _error.text('Please enter a valid email address').show();
      return false;
    } else if (dataObj.passwordLogin.length < 2) {
      _error
        .text('Please enter a passphrase that is at least 11 characters long.')
        .show();
      return false;
    }

    console.log(dataObj);

    // 'form.js-login'

    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

    $.ajax({
      type: 'POST',
      url: 'ajax/login.php',
      data: dataObj,
      dataType: 'json',
      async: true
    })
      .done(function ajaxDone(data) {
        // Whatever data is
        if (data.redirect !== undefined) {
          window.location = data.redirect;
        } else if (data.error !== undefined) {
          _error.html(data.error).show();
        }
      })
      .fail(function ajaxFailed(e) {
        console.log('I failed: login');
      })
      .always(function ajaxAlwaysDoThis(data) {
        // Always do
        console.log('Always');
      });

    return false;
  })

  .on('submit', 'form.js-verify-email', function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $('.js-error', _form);

    var dataObj = {
      emailVerify: $("input[name='email-verify']", _form).val()
    };

    if (dataObj.emailVerify.length < 6) {
      _error.text('Please enter a valid email address').show();
      return false;
    }

    console.log(dataObj);

    // Assuming the code gets this far, we can start the ajax process
    _error.hide();

    $.ajax({
      type: 'POST',
      url: 'ajax/forgot_password.php',
      data: dataObj,
      dataType: 'json',
      async: true
    })
      .done(function ajaxDone(data) {
        // Whatever data is
        if (data.redirect !== undefined) {
          window.location = data.redirect;
        } else if (data.error !== undefined) {
          _error.html(data.error).show();
        }
      })
      .fail(function ajaxFailed(e) {
        console.log('I failed: forgot password');
      })
      .always(function ajaxAlwaysDoThis(data) {
        // Always do
        console.log('Always');
      });

    return false;
  });

$(function() {
  $('#add-favorite-icon-link').click(function() {
    // $('li[name=star-outline]').click(function() {
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    let id = urlParams.get('id');

    console.log(id);

    manage_favorites(id, 'add');
    return false;
  });

  $('#remove-favorite-icon-link').click(function() {
    // $('li[name=star]').click(function() {
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    id = urlParams.get('id');

    console.log(id);

    manage_favorites(id, 'remove');
    return false;
  });

  function manage_favorites(id, action) {
    $.ajax({
      url: 'ajax/favorite.php',
      type: 'GET',
      dataType: 'text',
      data: {
        id: id,
        action: action
      },
      success: function(response) {
        if (response) {
          update_page(action, response);
          console.log(response);
        } else {
          // Do something!
          console.log(`I think I failed big dog ${action}`);
        }
      } // Success function.
    }); // Ajax
  } // End of manage_favorites() function.

  function update_page(action, response) {
    if (action === 'add') {
      $('#add-favorite-icon-link').replaceWith(response);
      console.log('You have successfully saved to your favorite');
    } else {
      $('#remove-favorite-icon-link').replaceWith(response);
      console.log('You have successfully deleted your record.');
    }
  } // End of update_page() function.
}); // Main anonymous function

$(function() {
  $('#fav-link').click(function() {
    // $('li[name=star-outline]').click(function() {
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    let id = urlParams.get('id');

    console.log(id);

    manage_notes(id, queryString);
    return false;
  });

  function manage_notes(id, queryString) {
    $.ajax({
      url: 'ajax/notes.php',
      type: 'GET',
      dataType: 'text',
      data: {
        id: id
      },
      success: function(response) {
        if (response && response !== 'failed') {
          window.location.href = response;
        } else if (response === 'failed') {
          // Do something!
          window.location.href = `page.php${queryString}`;
          // console.log(`I failed big dog ${queryString}`);
        }
      } // Success function.
    }); // Ajax
  } // End of manage_notes() function.
  // End of update_page() function.
}); // Main anonymous function

$(function() {
  $('#blog').click(function() {
    // $('li[name=star-outline]').click(function() {
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    let id = urlParams.get('id');

    console.log(id);

    manage_notes(id, queryString);
    return false;
  });

  function manage_notes(id, queryString) {
    $.ajax({
      url: 'ajax/blog.php',
      type: 'GET',
      dataType: 'text',
      data: {
        id: id
      },
      success: function(response) {
        if (response && response !== 'failed') {
          window.location.href = response;
        } else if (response === 'failed') {
          // Do something!
          window.location.href = `page.php${queryString}`;
          // console.log(`I failed big dog ${queryString}`);
        }
      } // Success function.
    }); // Ajax
  } // End of manage_notes() function.
  // End of update_page() function.
}); // Main anonymous function

$(function() {
  $('.review-link').click(function() {
    // $('li[name=star-outline]').click(function() {
    // const rate = $(this).data('rating');
    const rating = $(this).data('rating');
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    let id = urlParams.get('id');

    console.log(id);
    console.log(rating);

    manage_rating(id, rating);
    return false;
  });

  function manage_rating(id, rating) {
    $.ajax({
      url: 'ajax/rating.php',
      type: 'GET',
      dataType: 'text',
      data: {
        id: id,
        rating: rating
      },
      success: function(response) {
        if (response && response !== 'failed') {
          // window.location.href = response;
          console.log('You passed');
        } else if (response === 'failed') {
          // Do something!
          // window.location.href = `page.php${queryString}`;
          console.log(`You failed but your rating is ${queryString}`);
        }
      } // Success function.
    }); // Ajax
  } // End of manage_notes() function.
  // End of update_page() function.
}); // Main anonymous function
