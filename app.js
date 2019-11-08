const handleLogin=()=>{
	const url = 'account-actions.php';
	const email = _('email').value;
	const password = _('password').value;
	const formData = new FormData();
	const action = 'login'
	formData.append('email', email);
	formData.append('password', password);
	formData.append('login', 'true');

//= "email="+email+"&&password="+password+'&&login=login';

	if (email.trim().length<5) {
		alert('email is too short')
	}else if (password.trim().length<4) {
		alert('password is too short')
	}else{
		asyncRequest(url,method='post',formData,action)
	}
}

	const reserveAccount=()=>{
		const url = 'account-actions.php';
		const authorization=_('authorization').value
		const formData = new FormData();
		formData.append('authorization', authorization);
		formData.append('reserve-account', 'true');

		if (validateStringLength(authorization,5)) {
		asyncRequest(url,method='post', formData, action='reserve-account')
	    }else{
			_('info').innerHTML='wrong authorization code'
		}
	}

	const deallocateReservedAccount=()=>{
		const url = 'account-actions.php';
		const authorization=_('authorization').value
		const formData = new FormData();
		formData.append('authorization', authorization);
		formData.append('deallocate-reserved-account', 'true');


		if (validateStringLength(authorization,5)) {
		asyncRequest(url,method='post', formData, action='deallocate-reserved-account')
	   }else{
			_('info').innerHTML='wrong authorization code'
		}
	}

	const getTransactionStatus=()=>{
		const url = 'account-actions.php';
		const authorization=_('authorization').value
		const formData = new FormData();
		formData.append('authorization', authorization);
		formData.append('get-transaction-status', 'true');

		if (validateStringLength(authorization,5)) {
			asyncRequest(url,method='post', formData, action='deallocate-reserved-account')
		}else{
			_('info').innerHTML='wrong authorization code'
		}
		
	}



const asyncRequest=(url, method, formData,action)=>{
	console.log(formData)
	fetch(url, { method: method, body: formData })
	.then(function (response) {
	  return response.text();
	})
	.then(function (body) {
		if (action=='login') {
			_('response').innerHTML=body
			_('info').innerHTML='please copy the authorization code to use for API actions or refresh the page to login again'
			_('login-form').style.display='none';
			_('api-form').style.display='flex'
		}else{
			_('response').innerHTML=body
			_('info').style.display='none'
		}
	  console.log(body);
	  console.log(body.requestSuccessful);
	});
}

const validateStringLength=(string,length)=>{
if (string.trim().length<parseInt(length)) {
	return false;
}
return true;
}

const _=(dom)=>{
	return document.getElementById(dom)
}