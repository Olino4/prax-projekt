<!DOCTYPE html>
<html>

<head>
    <title>Spotify Web Playback SDK Quick Start</title>
</head>

<body>
    <h1>Spotify Web Playback SDK Quick Start</h1>
    <div style="display: flex; justify-content: center; top:50% ">
        <button id="previousTrack">&#8678;</button>
        <button id="togglePlay">||</button>
        <button id="nextTrack">&#8680;</button>

    </div>
    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <script>
        window.onSpotifyWebPlaybackSDKReady = () => {
            const token =
                'BQBB5efGXj0lTsrJhWaedRQAqslXT3CPPpHFnRRtq0ZUhwOdX4nsnNG5LoNNKaO9B6soA7s7unSxFdXPurbp9k2Ir7Yw55Dp2GRK6fwH8ilS_Vt8gGOapcbJkLgHD9_BAPf8JrFY1RJhAiiIjygG-O7unDY_U2_NCqm1O50fe24Phv8gqSAnXlzMbk0HEfrdeRpOUONeRPTp7kaMzf7HQqDKqh1J7_py9L6BjmbkJGeIIA5zF4f2DUGr2fLoyfl4';
            const player = new Spotify.Player({
                name: 'Web Playback SDK Quick Start Player',
                getOAuthToken: cb => {
                    cb(token);
                },
                volume: 0.5
            });

            if (true) {
                console.log(token);
            };

            // Ready
            player.addListener('ready', ({
                device_id
            }) => {
                console.log('Ready with Device ID', device_id);
            });

            // Not Ready
            player.addListener('not_ready', ({
                device_id
            }) => {
                console.log('Device ID has gone offline', device_id);
            });

            player.addListener('initialization_error', ({
                message
            }) => {
                console.error(message);
            });

            player.addListener('authentication_error', ({
                message
            }) => {
                console.error(message);
            });

            player.addListener('account_error', ({
                message
            }) => {
                console.error(message);
            });

            document.getElementById('togglePlay').onclick = function() {
                player.togglePlay().then(() => {
                    console.log('Togled play sucesfuly')
                });
            };

            document.getElementById('previousTrack').onclick = function() {
                player.previousTrack().then(() => {
                    console.log('Set to previous track!');
                });
            }

            document.getElementById('nextTrack').onclick = function() {
                player.nextTrack().then(() => {
                    console.log('Skipped to next track!');
                });
            }

            player.connect().then(succes => {
                if (succes) {
                    console.log('succesfully connected')
                } else {
                    console.error('failed')
                }
            })
        }
    </script>
</body>

</html>
