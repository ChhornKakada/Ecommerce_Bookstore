const express = require('express');
const cors = require('cors');
const app = express();
const fs = require('fs');
app.use(cors());
app.use(express.json());

app.get('/', (req, res) => {
  try {
    const data = JSON.parse(fs.readFileSync('db.json', 'utf8'));
    let output = '[\n';
    data.forEach((product, index) => {
      output += `  {\n`;
      output += `    "pictureUrl": "${product.pictureUrl}",\n`;
      output += `    "name": "${product.name}",\n`;
      output += `    "detail": "${product.detail}",\n`;
      output += `    "price": "${product.price}"\n`;
      output += `  }`;
      if (index < data.length - 1) {
        output += ',';
      }
      output += '\n';
    });
    output += ']';
    // send data
    res.send(output);
  } 
    // if error
  catch (err) {
    res.send({ message: 'Error reading db.json file!', error: err.message });
  }
});

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
      products = JSON.parse(fs.readFileSync('db.json', 'utf8'));
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