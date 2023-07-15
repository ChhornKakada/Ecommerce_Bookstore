var book = {
  async all(number = 15, isLatest = false) {
    var url = `http://127.0.0.1:8000/api/books?number=${number}`;
    if (isLatest) {
      url = `http://127.0.0.1:8000/api/books?number=${number}&isLatest=${isLatest}`;
    } 
    const res = await fetch(url, {
      method: "GET",
      headers: {
        "Content-type": "application/json"
      },
    });
    const result = await res.json();
    // if "data" of result equal to 0
    if (!result?.data.length) return [];
    return result;
  },

  async get(url) {
    const res = await fetch(url, {
      method: "GET",
      headers: {
        "Content-type": "application/json"
      },
    });
    const result = await res.json();
    // if "data" of result equal to 0
    if (!result?.data.length) return [];
    return result;
  },

  async byGenre(genreId, pageNumber) {
    // http://127.0.0.1:8000/api/books?genreId%5Beq%5D=1&page=1
    var url = `http://127.0.0.1:8000/api/books?genreId[eq]=${genreId}&page=${pageNumber}`;
    const res = await fetch(url, {
      method: "GET",
      headers: {
        "Content-type": "application/json"
      },
    });
    const result = await res.json();
    // if "data" of result equal to 0
    if (!result?.data.length) return [];
    return result;
  },

  async detail(bookId) {
    var url = `http://127.0.0.1:8000/api/books/${bookId}`;
    const res = await fetch(url, {
      method: "GET",
      headers: {
        "Content-type": "application/json"
      },
    });
    const result = await res.json();
    if (!result.data) return [];
    return result;
  }
}

export default book;