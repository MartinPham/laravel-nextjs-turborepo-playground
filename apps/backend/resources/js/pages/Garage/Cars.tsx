import { GarageCarRouteId, GarageCarsProps } from '@/lib/inertia';
import { Link } from '@inertiajs/react';

export default function Page({ data }: GarageCarsProps) {
    return (
        <div className="grid min-h-screen grid-rows-[20px_1fr_20px] items-center justify-items-center gap-16 p-8 pb-20 font-sans sm:p-20">
            <main className="row-start-2 flex flex-col items-center gap-[32px] sm:items-start">
                <ol className="list-inside list-decimal text-center font-mono text-sm/6 sm:text-left">
                    {data?.map((car) => (
                        <li key={car.id}>
                            <Link
                                href={route(GarageCarRouteId, {
                                    car: car.id,
                                })}
                            >
                                {car.model}
                            </Link>
                        </li>
                    ))}
                </ol>
            </main>
        </div>
    );
}
