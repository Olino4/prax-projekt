<!DOCTYPE html>
<html>

<head>
    <title>Spotify Web Playback SDK Quick Start</title>
</head>

<body>
    <h1>Spotify Web Playback SDK Quick Start</h1>
    <button id="togglePlay">Toggle Play</button>

    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <script>
        window.onSpotifyWebPlaybackSDKReady = () => {
            const token =
                'BQBSRSwDF_dAxR4ZvqJl8FMBkPjciPPqPLDUjOFYwx1mk5LCFxmWysYZOUbRHt8oABKrxu_uSYHwZqP7oO3Pxc59b2xA-tLPGqECgG5ntuT0oBz_XOpI00yWunGZlOHIyrIVUchzYRnYLnkwqwZ2iZQ7_TCh4PLn9OF00mLPRTwtXc95h6Yf2044Xhws-lUHcD38TL1sIQwalqu_BgAEtPmbFjZ09ci0oLwqi-AYwlwErrMiqN6hC9FevuVe3DfA';
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
