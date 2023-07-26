
var auth = {
  async register(user) {
    var url = `${process.env.API_HOST}:${process.env.API_PORT}/api/register`;
    const res = await fetch(url, {
      method: "POST",
      headers: {
        "Content-type": "application/json"
      },
      body: JSON.stringify(user)
    });
    const result = await res.json();
    return result;
  }
}

export default auth;