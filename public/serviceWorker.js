self.addEventListener('push', function(event) {
	const data = event.data.json();

	return event.waitUntil(
		self.registration.showNotification(
			data.title,
			{
				icon: data.icon,
				body: data.body,
				data: {
					url: data.url
				}
			}
		)
	);
}, false);

self.addEventListener('notificationclick', function(event) {
	event.notification.close();
	const data = event.notification.data;
	event.waitUntil(clients.matchAll({
		type: 'window'
	}).then(function(clientList) {
		for (var i = 0; i < clientList.length; i++) {
			var client = clientList[i];
			if (client.url === data.url && 'focus' in client) {
				return client.focus();
			}
		}
		if (clients.openWindow) {
			return clients.openWindow(data.url);
		}
	}));
});