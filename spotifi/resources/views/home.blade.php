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
                'BQCZonTMyyLAbXK-g37jwqEYhpvUZ_Wo1Tdu3zPsq_DvgwBKphCfmjr4Ri4Y2oOfTMsJl3q8Q9eKgGdNqcmkGJ3dVbQ_8FEfP2_q80IvMuMD398aNOlDsMFxWO2v3Q9ICXU58dvFXR_TR_cjgRQU45nJVmYH-AO4-uW7VXj_CuH_fl54nDgvzwObRTd2YhaS7GqQlNHj9CNV0YWlHll1RkhLPnvcNrZPPib198DVMJeYScQ_mb0OuDkNH-ZbEwP1';
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
