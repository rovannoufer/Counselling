const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

const pass = require('passport');
const jwt=

const app = express();
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

mongoose.connect('mongodb://localhost:27017', { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('Connected to MongoDB'))
  .catch(error => console.log(error));

const Contact = mongoose.model('Contact', {
  name: String,
  email: String,
  message: String
});

app.post('/submit', (req, res) => {
  const { name, email, message } = req.body;

  const contact = new Contact({ name, email, message });
  contact.save()
    .then(() => {
      res.send('Message sent successfully!');
    })
    .catch(error => {
      console.log(error);
      res.status(500).send('Failed to send message!');
    });
});

app.listen(3000, () => {
  console.log('Server started on port 3000');
});
