const express = require('express');
const cors = require('cors');
// for reading and write data
const fs = require('fs');

const app = express();

// app use cor and express 
app.use(cors());
app.use(express.json());


// api for latest books
app.get('/book/latest/:number', (req, res) => {
  try {
    // read data from db
    const data = JSON.parse(fs.readFileSync('db/book.json', 'utf8'));
    // Get the 'number' parameter from the URL and convert it to an integer
    const number = parseInt(req.params.number);
    let output = [];
    for (let i = 0; i < number; i++) {
      if (i < data.length) {
        output.push(data[i]);
      } else break;
    }
    // send data
    res.send(output);
  } 
    // if error
  catch (err) {
    res.send({ message: 'Error reading db.json file!', error: err.message });
  }
});


// api for books
app.get('/book/list/:number', (req, res) => {
  try {
    const data = JSON.parse(fs.readFileSync('db/book.json', 'utf8'));
    const number = parseInt(req.params.number);
    let output = [];
    // this data doesn't want to first 3 datas
    for (let i = 0; i < data.length; i++) {
      if (i >= 3 && i < number + 3) {
        output.push(data[i]);
      } 
      if (i >= number + 3) break;
    }
    res.send(output);
  } catch (err) {
    res.send({message: 'Error reading db.json file!', error: err.message});
  }
})

// api for books
app.get('/genre/list/:number', (req, res) => {
  try {
    const data = JSON.parse(fs.readFileSync('db/genre.json', 'utf8'));
    const number = parseInt(req.params.number);
    let output = [];
    // this data doesn't want to first 3 datas
    for (let i = 0; i < number; i++) {
      output.push(data[i]);
    }
    res.send(output);
  } catch (err) {
    res.send({message: 'Error reading db.json file!', error: err.message});
  }
})



app.post('/products', (req, res) => {

  // varible tmp for storing data from request
  const product = {
    pictureUrl: req.body.pictureUrl,
    name: req.body.name,
    detail: req.body.detail,
    price: req.body.price
  };
  
  try {
    let products = [];
    try {
      // fetch data from db
      products = JSON.parse(fs.readFileSync('db/book.json', 'utf8'));
    } 
    // if error
    catch (err) { }

    // add new record
    products.push(product);
    // replace old-db to old-db
    fs.writeFileSync('db.json', JSON.stringify(products));

    // send response back
    res.send({ message: 'Data added successful!', product });
  } catch (err) {
    res.send({ message: 'Data added unsuccessful!', error: err.message });
  }
});

app.listen(3000, () => console.log('Listening on port 3000...'));