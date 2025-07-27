const express = require('express');
const cors = require('cors');

const app = express();
app.use(cors());

app.get('/api/microservice', (req, res) => {
    res.json({ 
        message: "Login sucessfull!",
        data: {
            service: "Node Microservice",
            version: "1.0.0",
            status: "running"
        }
    });
});

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Node microservice running on port ${PORT}`);
});