var genre = {
  async all(number = 15) {
    const res = await fetch(`${process.env.API_HOST}:${process.env.API_PORT}/api/genres?number=${number}`, {
      method: "GET",
      headers: {
        "Content-type": "application/json"
      },
    });
    const result = await res.json();
    // if "data" of result equal to 0
    if (!result?.data.length) return [];
    return result;
  }
}

export default genre;