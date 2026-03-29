var filesToCache = [
    "/",
    "./login",
    "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js",
];

self.addEventListener("install", e => {
    e.waitUntil(
        caches.open("static").then(cache =>{
            return cache.add(filesToCache);
        })
    );
});

/* Serve cached content when offline */
self.addEventListener('fetch', function(e) {
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});