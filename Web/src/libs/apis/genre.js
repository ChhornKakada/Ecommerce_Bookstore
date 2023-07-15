var genre = {
  async all(number = 15) {
    const res = await fetch(`http://127.0.0.1:8000/api/genres?number=${number}`, {
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