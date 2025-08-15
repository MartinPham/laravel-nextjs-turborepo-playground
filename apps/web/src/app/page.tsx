import { garageCars } from "@repo/api-client";
import Link from "next/link";

export const dynamic = 'force-dynamic';

export default async function Home() {
  const { data } = await garageCars();
  return (
    <div className="font-sans grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20">
      <main className="flex flex-col gap-[32px] row-start-2 items-center sm:items-start">
        <ol className="font-mono list-inside list-decimal text-sm/6 text-center sm:text-left">
          {data.data?.map((car) => (
            <Link key={car.id} href={`/cars/${car.id}`}>
              <li  className="tracking-[-.01em]">
                {car.model}
              </li>
            </Link>
          ))}
        </ol>
      </main>
    </div>
  );
}
