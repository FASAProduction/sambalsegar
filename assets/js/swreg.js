if ("serviceWorker" in navigator) {
	navigator.serviceWorker
		.register("sw.min.js")
		.then(function (registration) {
			console.log("SW registration succeeded with scope:", registration.scope);
		})
		.catch(function (e) {
			console.log("SW registration failed with error:", e);
		});
}
