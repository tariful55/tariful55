<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Mirror</title>
    <style>
        /* Style for the mirror video */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #333;
        }

        video {
            width: 80%;
            max-width: 600px;
            border: 5px solid white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
            transform: scaleX(-1); /* Mirror effect by flipping horizontally */
        }
    </style>
</head>
<body>

    <video id="mirror" autoplay playsinline muted></video>

    <script>
        const videoElement = document.getElementById('mirror');

        // Function to request camera access
        async function startMirror() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                videoElement.srcObject = stream;
                console.log("Camera access granted");
            } catch (error) {
                console.error("Error accessing the camera: ", error);

                if (error.name === "NotAllowedError") {
                    alert("Camera access has been blocked. Please enable it in your browser settings.");
                } else if (error.name === "NotFoundError") {
                    alert("No camera found on this device.");
                } else {
                    alert("Error accessing the camera: " + error.message);
                }
            }
        }

        // Start mirror when the page loads
        window.onload = startMirror;
    </script>

</body>
</html>