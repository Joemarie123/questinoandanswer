<template>
  <div>
    <div class="timer">
      {{ formatTime(hours) }} : {{ formatTime(minutes) }} : {{ formatTime(seconds) }}
    </div>
    <v-dialog  persistent v-model="isTimeUpDialogOpen" max-width="300">
      <v-card>
        <v-card-text class="time-up-message">Time is up! Proceed To Essay</v-card-text>
        <v-btn color="green">OK</v-btn>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hours: 0,
      minutes: 1,
      seconds: 0,
      isCountdownRunning: false,
      isTimeUp: false,
      isTimeUpDialogOpen: false,
    };
  },
  mounted() {
    this.startCountdown();
  },
  methods: {
    startCountdown() {
      if (this.isCountdownRunning) return;
      this.isCountdownRunning = true;

      let totalSeconds = this.hours * 3600 + this.minutes * 60;

      const countdownInterval = setInterval(() => {
        if (totalSeconds > 0) {
          totalSeconds--;
          this.hours = Math.floor(totalSeconds / 3600);
          this.minutes = Math.floor((totalSeconds % 3600) / 60);
          this.seconds = totalSeconds % 60;
        } else {
          clearInterval(countdownInterval);
          this.isCountdownRunning = false;
          this.isTimeUp = true;
          this.isTimeUpDialogOpen = true;
        }
      }, 1000);
    },
    formatTime(time) {
      return time.toString().padStart(2, '0');
    },
  },
};
</script>

<style>
.timer {
  font-size: 24px;
  margin-bottom: 10px;
}

.time-up-message {
  font-weight: bold;
}
</style>
