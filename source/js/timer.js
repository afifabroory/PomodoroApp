class Timer {
    #timerDom = document.getElementById('timer');
    #actionDom = document.getElementById('timer_action');

    #state = {
        RUNNING: 0,
        STOP: 1,
        IDLE: 3,
    }
    #currentState = this.#state.IDLE;

    getTimeState() {
        return this.#currentState;
    }

    setTimerState(state) {
        this.#currentState = state;
    }

    // #second and #minutes store time elapsed (total, startTime)
    #second = [0, 0]; 
    #minutes = [0, 0];

    resetTimeElapsed() {
        this.#second = [0, 0];
        this.#minutes = [0, 0];
    }

    #updateInterval;
    #timerTimeout;

    debugTimeState(state) {
        document.getElementById('timerState').innerText = state;
    }

    // parameter workDuration bertugas untuk memulai timer berdasarkan durasi state pomodoro, 
    // dengan asumsi workDuration hanya untuk distart tanpa dipause
    startTimer(workDuration) {
        return new Promise((resolve) => {
            console.log('startTimer')

            // Turn workDuration into seconds
            workDuration *= 60;

            console.log(this.#minutes)
            console.log(this.#second)

            if (this.getTimeState() == this.#state.STOP) {
                // Time remaining
                workDuration -= this.#minutes[0] * 60;
                workDuration -= this.#second[0];

                console.log('CONTINUE... (' + workDuration + ' seconds)');
            }


            
            this.#actionDom.innerText = 'Stop';
            this.setTimerState(this.#state.RUNNING);
            this.debugTimeState('RUNNING');

            this.#updateInterval = this.#updateDom(workDuration);
            this.#timerTimeout = setTimeout(() => {
                resolve();
                clearInterval(this.#updateInterval);
            }, workDuration * 1000 + 1000);
        });    }

    stopTimer() {
        this.#actionDom.innerText = 'Continue';

        this.setTimerState(this.#state.STOP);
        this.debugTimeState('STOP');

        clearInterval(this.#updateInterval);
        clearTimeout(this.#timerTimeout);

        this.#second[0] += this.#second[1]
        this.#minutes[0] += this.#minutes[1]
    }

    #updateDom(seconds) {
        let startTime = Date.now();
        let endTime;
        return setInterval(() => {
            endTime = Date.now();
            this.#second[1] = Math.floor((endTime - startTime) / 1000);
            this.#minutes[1] = Math.floor((seconds - this.#second[1]) / 60);
            
            if (seconds - this.#second[1]>= 0)
                this.#timerDom.innerText = String(this.#minutes[1]).padStart(2, '0') + ':' + String((seconds - this.#second[1]) % 60).padStart(2, '0');
        }, 300);
    }
}

class Pomodoro extends Timer {
    #workDuration; 
    #shortBreakDuration;
    #longBreakDuration;
    #session = 1;

    #state = {
        WORK: 0,
        SHORT_BREAK: 1,
        LONG_BREAK: 2,
        IDLE: 3,
    }
    #pomodoroState = this.#state.IDLE;

    constructor(workDuration, shortBreakDuration, longBreakDuration) {
        super();
        this.#workDuration = workDuration;
        this.#shortBreakDuration = shortBreakDuration;
        this.#longBreakDuration = longBreakDuration;
    }

    getPomodoroState() {
        return this.#pomodoroState;
    }

    #setPomodoroState(state) {
        this.#pomodoroState = state;
    }

    setWorkDuration(workDuration) {
        this.#workDuration = workDuration;
    }
    
    setShortBreakDuration(shortBreakDuration) {
        this.#shortBreakDuration = shortBreakDuration;
    }
    
    setLongBreakDuration(longBreakDuration) {
        this.#longBreakDuration = longBreakDuration;
    }

    debugPomodoroState(state) {
        document.getElementById('pomodoroState').innerText = state;
    }

    async #start() {
        while (true) {
            if (this.getPomodoroState() == this.#state.IDLE || this.getPomodoroState() == this.#state.WORK) {
                this.#setPomodoroState(this.#state.WORK);
                this.debugPomodoroState('WORK')
                await this.startTimer(this.#workDuration);
                this.resetTimeElapsed();
            }

            if (this.#session != 4) {
                this.#setPomodoroState(this.#state.SHORT_BREAK);
                this.debugPomodoroState('SHORT_BREAK')
                await this.startTimer(this.#shortBreakDuration);
                this.#setPomodoroState(this.#state.IDLE);
                this.#session++;
            } else {
                this.#setPomodoroState(this.#state.LONG_BREAK);
                this.debugPomodoroState('LONG_BREAK')
                await this.startTimer(this.#longBreakDuration);
                this.#setPomodoroState(this.#state.IDLE);
                this.#session = 1;
            }
            this.resetTimeElapsed();
        }
    }

    #stop() {
        console.log('STOP')
        this.stopTimer();
    }

    toggle() {
        if (this.getTimeState() == 3 || this.getTimeState() == 1)
            this.#start()
        else
            this.#stop()
    }
}

const app = new Pomodoro(1, 0.5, 1);