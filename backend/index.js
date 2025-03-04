const express = require("express");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const { v4: uuidv4 } = require("uuid");
require("dotenv").config();
const mongoose = require("mongoose");

const app = express();
const port = 3000;
const SECRET_KEY = "your_secret_key"; // Replace with a secure key
// Improved MongoDB Connection
const MONGODB_URI = process.env.MONGODB_URI;

if (!MONGODB_URI) {
  console.error("ERROR: MONGODB_URI is not defined in .env file");
  process.exit(1); // Exit the application if no MongoDB URI is provided
}

mongoose
  .connect(process.env.MONGODB_URI, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  })
  .then(() => console.log("Connected to MongoDB"))
  .catch((error) => {
    console.error("MongoDB Connection Error:", error);
    process.exit(1);
  });

app.use(express.json()); // Middleware to parse JSON bodies

console.log("Prayatan 2.0 Start!!");

// Dummy databases (replace with actual database)
let users = [];
let stations = [];

// ✅ User Signup Endpoint
app.post("/api/signup", async (req, res) => {
  try {
    const { email, password, name } = req.body;

    // Check if user already exists
    if (users.find((u) => u.email === email)) {
      return res.status(400).json({ message: "Email already exists" });
    }

    // Hash the password before storing
    const hashedPassword = await bcrypt.hash(password, 10);

    // Create new user
    const newUser = {
      uid: uuidv4(),
      name,
      email,
      password: hashedPassword,
      userType: "user", // Default user type
      timestamp: new Date().toISOString(),
    };

    users.push(newUser);

    res.status(201).json({ message: "User signed up successfully" });
  } catch (error) {
    res.status(500).json({ message: "Internal Server Error", error });
  }
});

// ✅ Signup Station Endpoint
app.post("/api/signup/station", (req, res) => {
  try {
    const { station, password, name } = req.body;

    if (stations.find((s) => s.station === station)) {
      return res.status(400).json({ message: "Station already exists" });
    }

    const newStation = {
      station,
      name,
      password, // Consider hashing this before storing
      createdAt: new Date().toISOString(),
    };

    stations.push(newStation);

    res.status(201).json({ message: "Station created successfully" });
  } catch (error) {
    res.status(500).json({ message: "Internal Server Error", error });
  }
});

// ✅ User Login Endpoint
app.post("/api/login", async (req, res) => {
  try {
    const { email, password } = req.body;

    // Find user by email
    const user = users.find((u) => u.email === email);
    if (!user) {
      return res.status(404).json({ message: "User not found" });
    }

    // Compare passwords
    const isMatch = await bcrypt.compare(password, user.password);
    if (!isMatch) {
      return res.status(401).json({ message: "Incorrect password" });
    }

    // Generate JWT Token
    const token = jwt.sign(
      { uid: user.uid, email: user.email, userType: user.userType },
      SECRET_KEY,
      { expiresIn: "1h" },
    );

    res.status(200).json({ message: "Login successful", token });
  } catch (error) {
    res.status(500).json({ message: "Internal Server Error", error });
  }
});

// ✅ Station Sign-in Endpoint
app.post("/api/station/signin", (req, res) => {
  try {
    const { station, password } = req.body;
    const foundStation = stations.find((s) => s.station === station);

    if (!foundStation) {
      return res.status(404).json({ message: "Station not found" });
    }

    if (foundStation.password !== password) {
      return res.status(401).json({ message: "Incorrect password" });
    }

    res.status(200).json({
      message: "Station signed in successfully",
      station: foundStation,
    });
  } catch (error) {
    res.status(500).json({ message: "Internal error occurred", error });
  }
});

// ✅ User Inspection Form Submission
app.post("/api/user/form", (req, res) => {
  try {
    // Here you should store data in a database, not push to response
    console.log("Received user form data:", req.body);
    res
      .status(200)
      .json({ message: "User inspection form submitted successfully" });
  } catch (error) {
    res.status(500).json({ message: "Internal Server Error", error });
  }
});

// ✅ Start the server
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
