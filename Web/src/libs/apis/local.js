var local = {

  // remov data
  remove(key) {
    localStorage.removeItem(key);
  },

  // set data 
  set(key, data) {
    localStorage.setItem(key, JSON.stringify(data));
  },


  // add book to cart
  addBookToCart(key, element) {
    if (localStorage.getItem(key)) {
      var array = localStorage.getItem(key);
      array = JSON.parse(array);
      var isExist = false;
      for (let i = 0; i < array.length; i++) {
        if (array[i].bookId == element.bookId) {
          array[i].qty += element.qty;
          array[i].totalPrice += element.totalPrice;
          isExist = true;
          break;
        }
      }
      if (isExist == false) {
        array.push(element);
      }
      this.set(key, array);
    } else {
      var array = []
      array.push(element);
      this.set(key, array);
    }
  },

  // Increase the quantity the book in the cart
  increaseQtyBookInCart(key, bookId, qty, pricePerUnit) {
    if (localStorage.getItem(key)) {
      var array = this.get(key);
      for (let i = 0; i < array.length; i++) {
        if (array[i].bookId == bookId) {
          array[i].qty += qty;
          array[i].totalPrice = array[i].qty * pricePerUnit;
          break
        }
      }
      this.set(key, array);
    } 
  }, 


  // get the data
  get(key) {
    var data = localStorage.getItem(key);
    // alert(key + ": " + data)
    return JSON.parse(data);
  },


  // remove book from cart even if there the quantity greater than 1
  removeBookFromCart(key, bookId) {
    var array = this.get(key);
    for (let i = 0; i < array.length; i++) {
      if (array[i].bookId === bookId) {
        array.splice(i, 1);
        break;
      }
    }
    localStorage.setItem(key, JSON.stringify(array));
  }
}

export default local;