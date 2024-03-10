function filterDate() {
    return {
        datePickerOpen: false,
        datePickerValue: "",
        datePickerFormat: "M d, Y",
        datePickerMonth: "",
        datePickerYear: "",
        datePickerDay: "",
        datePickerDaysInMonth: [],
        datePickerBlankDaysInMonth: [],
        datePickerMonthNames: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ],
        datePickerDays: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        startDate: null,
        endDate: null,
        datePickerDayClicked(day) {
            const selectedDate = new Date(
                this.datePickerYear,
                this.datePickerMonth,
                day
            );
            // If no start date is selected or the selected date is before the start date, set it as the new start date
            if (!this.startDate || selectedDate < this.startDate) {
                this.startDate = selectedDate;
                this.endDate = null; // Reset end date
            } else if (!this.endDate || selectedDate > this.startDate) {
                // If a start date is selected and the selected date is after, set it as the end date
                this.endDate = selectedDate;
            }

            // Update the display value
            if (this.startDate && this.endDate) {
                // Format and display the range
                this.datePickerValue = `${this.datePickerFormatDate(
                    this.startDate
                )} - ${this.datePickerFormatDate(this.endDate)}`;
            } else if (this.startDate) {
                // Just show the start date if the end date isn't selected yet
                this.datePickerValue = this.datePickerFormatDate(
                    this.startDate
                );
            }

            this.$refs.datePickerInput.value = this.datePickerValue;
            Livewire.emit("updateDueDate", this.datePickerValue);
            this.$wire.emit("setDates", this.startDate, this.endDate);
            // This would be where you might want to close the picker or adjust UI for range selection
            // this.datePickerOpen = false; // Consider when to close the picker
        },

        datePickerIsInRange(day) {
            const checkDate = new Date(
                this.datePickerYear,
                this.datePickerMonth,
                day
            );
            return (
                (this.startDate &&
                    !this.endDate &&
                    checkDate.toDateString() ===
                        this.startDate.toDateString()) ||
                (this.startDate &&
                    this.endDate &&
                    checkDate >= this.startDate &&
                    checkDate <= this.endDate)
            );
        },

        datePickerPreviousMonth() {
            if (this.datePickerMonth == 0) {
                this.datePickerYear--;
                this.datePickerMonth = 12;
            }
            this.datePickerMonth--;
            this.datePickerCalculateDays();
        },
        datePickerNextMonth() {
            if (this.datePickerMonth == 11) {
                this.datePickerMonth = 0;
                this.datePickerYear++;
            } else {
                this.datePickerMonth++;
            }
            this.datePickerCalculateDays();
        },
        datePickerIsSelectedDate(day) {
            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
            return this.datePickerValue === this.datePickerFormatDate(d)
                ? true
                : false;
        },
        datePickerIsToday(day) {
            const today = new Date();
            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
            return today.toDateString() === d.toDateString() ? true : false;
        },
        datePickerCalculateDays() {
            let daysInMonth = new Date(
                this.datePickerYear,
                this.datePickerMonth + 1,
                0
            ).getDate();
            // find where to start calendar day of week
            let dayOfWeek = new Date(
                this.datePickerYear,
                this.datePickerMonth
            ).getDay();
            let blankdaysArray = [];
            for (var i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }
            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }
            this.datePickerBlankDaysInMonth = blankdaysArray;
            this.datePickerDaysInMonth = daysArray;
        },
        datePickerFormatDate(date) {
            let formattedDay = this.datePickerDays[date.getDay()];
            let formattedDate = ("0" + date.getDate()).slice(-2); // appends 0 (zero) in single digit date
            let formattedMonth = this.datePickerMonthNames[date.getMonth()];
            let formattedMonthShortName = this.datePickerMonthNames[
                date.getMonth()
            ].substring(0, 3);
            let formattedMonthInNumber = (
                "0" +
                (parseInt(date.getMonth()) + 1)
            ).slice(-2);
            let formattedYear = date.getFullYear();

            if (this.datePickerFormat === "M d, Y") {
                return `${formattedMonthShortName} ${formattedDate}, ${formattedYear}`;
            }
            if (this.datePickerFormat === "MM-DD-YYYY") {
                return `${formattedMonthInNumber}-${formattedDate}-${formattedYear}`;
            }
            if (this.datePickerFormat === "DD-MM-YYYY") {
                return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`;
            }
            if (this.datePickerFormat === "YYYY-MM-DD") {
                return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`;
            }
            if (this.datePickerFormat === "D d M, Y") {
                return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`;
            }

            return `${formattedMonth} ${formattedDate}, ${formattedYear}`;
        },
    };
}
