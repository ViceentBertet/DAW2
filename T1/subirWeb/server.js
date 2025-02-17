const express = require('express');
const db = require('./database.js');
const app = express();
const cors = require('cors');

app.use(express.json());
app.use(cors());
app.use(express.static("public"));

app.get('/users', (req, res) => {
    db.all("SELECT * FROM users", [], (err, rows) => {
        if (err) {
            res.status(500).json({ error: err.message });
            return;
        }
        res.json(rows);
    });
});
const PORT = process.env.PORT || 3000;
app.get('/', (req, res) => {
    res.send('Servidor funcionando. Accede a /users para ver los datos.');
});
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});