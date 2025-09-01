import React from "react";

export const ScheduleSection = (): JSX.Element => {
    const scheduleData = [
        { period: 1, time: "07:15-07:55", subject: "Matematika" },
        { period: 2, time: "07:55-08:35", subject: "Matematika" },
        { period: 3, time: "08:35-09:15", subject: "Matematika" },
        { period: 4, time: "09:30-10:10", subject: "Matematika" },
        { period: 5, time: "10:10-10:50", subject: "Matematika" },
        { period: 6, time: "10:50-11:30", subject: "B. Indonesia" },
        { period: 7, time: "11:30-12:10", subject: "B. Indonesia" },
        { period: 8, time: "13:00-13:40", subject: "Olahraga" },
        { period: 9, time: "13:40-14:20", subject: "Olahraga" },
        { period: 10, time: "14:20-15:00", subject: "Olahraga" },
    ];

    return (
        <section
            className="flex flex-col w-[428px] h-[720px] items-center justify-center gap-9 p-8 absolute top-0 left-[851px] bg-white rounded-[48px_0px_0px_48px] border-2 border-solid border-black aspect-[0.59]"
            role="region"
            aria-label="Daily Class Schedule"
        >
            <div className="flex w-[364px] h-[656px] items-center gap-2.5 relative">
                <div className="flex flex-col w-[158px] h-[663px] items-center justify-center gap-[17px] relative mt-[-3.50px] mb-[-3.50px]">
                    {scheduleData.map((item) => (
                        <div
                            key={item.period}
                            className="w-[158px] justify-between px-2.5 py-[18px] relative flex-1 grow bg-[#93ddff] rounded-2xl border-2 border-solid border-black shadow-[5px_5px_0px_#000000] flex items-center"
                            role="listitem"
                        >
                            <div className="flex w-[42px] h-[42px] items-center justify-center gap-2.5 p-2.5 relative mt-[-13.50px] mb-[-13.50px] ml-[-2.00px] bg-white rounded-[14px] border-2 border-solid border-black aspect-[1]">
                                <span
                                    className={`relative w-fit mt-[-6.00px] mb-[-2.00px] ${item.period === 10 ? "ml-[-5.00px] mr-[-1.00px]" : ""} [font-family:'Be_Vietnam_Pro-Bold',Helvetica] font-bold text-black text-2xl tracking-[0] leading-[normal]`}
                                    aria-label={`Period ${item.period}`}
                                >
                                    {item.period}
                                </span>
                            </div>

                            <time
                                className="relative w-fit mt-[-3.50px] [font-family:'Be_Vietnam_Pro-Bold',Helvetica] font-bold text-black text-sm tracking-[0] leading-[normal]"
                                dateTime={item.time}
                            >
                                {item.time}
                            </time>
                        </div>
                    ))}
                </div>

                <div
                    className="flex flex-col w-[198px] h-[656px] items-center gap-[17px] relative mr-[-2.00px]"
                    role="list"
                    aria-label="Subject names"
                >
                    {scheduleData.map((item) => (
                        <div
                            key={`subject-${item.period}`}
                            className="inline-flex items-center justify-center gap-2.5 relative flex-1 grow"
                            role="listitem"
                        >
                            <span className="relative w-[198px] h-8 [font-family:'Be_Vietnam_Pro-Bold',Helvetica] font-bold text-black text-lg tracking-[0] leading-[normal]">
                                {item.subject}
                            </span>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
};
