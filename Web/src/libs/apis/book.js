var book = {
  async all(number = 15, sortBy = "All") {
    var url = `${process.env.API_HOST}:${process.env.API_PORT}/api/books?number=${number}`;
    if (sortBy != "All") {
      url = `${process.env.API_HOST}:${process.env.API_PORT}/api/books?number=${number}&sortBy=${sortBy}`;
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

  async byGenre(genreId = 0, pageNumber = 1, sortBy = 'All') {
    if (sortBy == "New Arrival") {
      sortBy = 'Latest'
    }
    var url = `${process.env.API_HOST}:${process.env.API_PORT}/api/books?genreId[eq]=${genreId}&page=${pageNumber}&sortBy=${sortBy}`;
    if (parseInt(genreId) === 0) {
      url = `${process.env.API_HOST}:${process.env.API_PORT}/api/books?page=${pageNumber}&sortBy=${sortBy}`;
      // alert(genreId)
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

  async detail(bookId) {
    var url = `${process.env.API_HOST}:${process.env.API_PORT}/api/books/${bookId}`;
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