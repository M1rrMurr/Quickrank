export function getDays(year, month) {
    let date = new Date(year, month, 1);
    const days = [];
    while (date.getDay() > 1) {
        date.setDate(date.getDate() - 1);
        days.push(new Date(date));
    }
    if (date.getDay() === 0) {
        for (let i = 6; i > 0; i--) {
            date.setDate(date.getDate() - 1);
            days.push(new Date(date));
        }
    }
    date = new Date(year, month, 1);
    while (date.getMonth() === month) {
        days.push(new Date(date));
        date.setDate(date.getDate() + 1);
    }
    return days;
}
