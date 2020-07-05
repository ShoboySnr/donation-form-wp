// Custom JS scripts

function getActivePaymentMethod(plugin_dir) {
  let returnData = '';
  $.ajax({
    url: plugin_dir+'/actions/fileAjax.php',
    data: {
      type: 'payment_method'
    },
    success: function(data) {
      returnData = data;
      alert(data);
    },
    error: function (err) {
      console.log(error);
      alert('An error occurred');
    },
    type: 'POST',
  });

  return returnData;
}

function payWithRave(emailAddress, amount, currency, txref, firstName, lastName) {
  const API_publicKey = 'FLWPUBK-d5b37a7f92537b313848014ebbcb4b33-X';
  var x = getpaidSetup({
      PBFPubKey: API_publicKey,
      customer_email: emailAddress,
      amount: amount,
      currency: currency,
      txref: txref,
      meta: [{
          metaname: "First Name",
          metavalue: firstName
      },
      {
        metaname: "Last Name",
        metavalue: lastName
      }],
      onclose: function () {
        alert('Your transaction has been closed.');
      },
      callback: function(response) {
          var txref = response.data.txRef; // collect txRef returned and pass to a                    server page to complete status check.
          if (
              response.respcode == "00" ||
              response.respcode == "0"
          ) {
            window.location.href = '../donation-confirmation';
          } else {
            alert('Your transaction failed.');
            window.location.href = '../donation-failed';
          }

          x.close(); // use this to close the modal immediately after payment.
      }
  });
}

function payWithPaystack(emailAddress, amount, currency, txref, firstName, lastName, phoneNumber) {
  const API_publicKey = 'sk_live_3fc63cca1cf1a09a7c43c7bd84c93a0a2ab428c7';
  var handler = PaystackPop.setup({
    key: API_publicKey,
    email: emailAddress,
    amount: amount * 100,
    currency: currency,
    ref: txref, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    metadata: {
      custom_fields: [
        {
          display_name: "First Name",
          variable_name: "first_name",
          value: firstName,
        },
        {
          display_name: "Last Name",
          variable_name: "last_name",
          value: lastName,
        },
        {
          display_name: "Phone Number",
          variable_name: "phone_number",
          value: phoneNumber,
        },
        
      ]
    },
    callback: function (response) {
        alert('Your donation was successful. Your transaction ID is ' + response.reference + '. Please check your email inbox for confirmation. Thanks.');
    },
    onClose: function(){
        alert('Your transaction has been closed.');
    }
  });
  handler.openIframe();
}

$(window).on('load', function () {
  $('.d-group #submit-button').on('click', function (event) {
    const firstName = $('.d-group #firstName').val();
    const lastName = $('.d-group #lastName').val();
    const emailAddress = $('.d-group #emailaddress').val();
    const phoneNumber = $('.d-group #phonenumber').val();
    let amount = $('.d-group input[name=amount]:checked').val();
    let amount_2 = $('.d-group #amount_2').val();
    const currency = $('.d-group #currency').val();
    const plugin_dir = $('.d-group #plugin_dir').val();
    let error = '';

    // alert(getActivePaymentMethod(plugin_dir));
  
    if (emailAddress === '') {
      error += 'Email address cannot be blank<br />';
    }

    if (firstName === '') {
      error += 'First Name cannot be empty <br />';
    }

    if (lastName === '') {
      error += 'Last Name cannot be empty <br />';
    }

    if (amount === '' && amount_2 === '') {
      error += 'Please choose an amount to donate <br />';
    }



    if (error.length > 0) {
      $('#donateform #error').html(error);
      return;
    }

    $('#donateform #error').html('');

    if (amount == 'other') {
      amount = amount_2;
    }

    txref = Math.floor(100000000 + Math.random() * 900000000);
  
    payWithPaystack(emailAddress, amount, currency, txref, firstName, lastName, phoneNumber);

    event.preventDefault();
    return
  });

  $('.d-group input[name=amount]').on('change', function () {
    if ($(this).val() == 'other') {
      $('#show_other_amount').show(500);
    }
    else $('#show_other_amount').hide(500);
  })
})
