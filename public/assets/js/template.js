function urlB64ToUint8Array(base64String) {
	const padding = '='.repeat((4 - base64String.length % 4) % 4);
	const base64 = (base64String + padding)
		.replace(/\-/g, '+')
		.replace(/_/g, '/');

	const rawData = window.atob(base64);
	const outputArray = new Uint8Array(rawData.length);
	for (let i = 0; i < rawData.length; ++i) {
		outputArray[i] = rawData.charCodeAt(i);
	}
	return outputArray;
}

function encodeBase64URL(buffer) {
	return btoa(String.fromCharCode.apply(null, new Uint8Array(buffer)))
			.replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
}

function register_subscription(subscription) {
	const endpoint = subscription.endpoint;
	const key = encodeBase64URL(subscription.getKey('p256dh'));
	const token = encodeBase64URL(subscription.getKey('auth'));
	const post_data = {
		endpoint: endpoint,
		key: key,
		token: token
	};
	$.post(
		'/notification/register',
		post_data,
		function(data) {
			console.log(data);
		}
	);
}

const server_key = urlB64ToUint8Array('BBo1HQ-3J_fds91Aot__hNW_Om1qbAXZiKXPixqUTI06mqIsNviisLFeLEYfWxHGZz7QQPCCSglALTzgNLCUCC4');

navigator.serviceWorker.register('serviceWorker.js').then(function (registration) {
	registration.pushManager.getSubscription().then(function (subscription) {
		if (subscription) {
			register_subscription(subscription);
			return;
		}

		registration.pushManager.subscribe({
			userVisibleOnly: true,
			applicationServerKey: server_key
		}).then(function (subscription) {
			register_subscription(subscription);
			return;
		})
	});
});