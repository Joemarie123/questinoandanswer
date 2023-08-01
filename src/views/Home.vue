<template>
  <div class="timer">
    {{ formatTime(hours) }} : {{ formatTime(minutes) }} : {{ formatTime(seconds) }}
  </div>
</template>

<script>
export default {
  data() {
    return {
      hours: 2,
      minutes: 30,
      seconds: 0,
      isCountdownRunning: false,
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
</style>
