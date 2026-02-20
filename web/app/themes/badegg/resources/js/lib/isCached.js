export default function isCached(url = '')
{
  return new Promise((resolve, reject) => {
    fetch(url, { method: 'HEAD' })
      .then(response => {
        // If the status is 200 (OK), the file exists in the cache or on the server
        resolve(response.status === 200);
      })
      .catch(() => {
        // If there's an error (e.g., network issue), we assume the file is not cached
        resolve(false);
      });
  });
}
