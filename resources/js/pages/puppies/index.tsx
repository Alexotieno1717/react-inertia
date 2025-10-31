import { PageWrapper } from "@/components/PageWrapper";
import { Container } from "@/components/Container";
import { Header } from "@/components/Header";
import { Search } from "@/components/Search";
import { Shortlist } from "@/components/Shortlist";
import { PuppiesList } from "@/components/PuppiesList";
import { NewPuppyForm } from "@/components/NewPuppyForm";

import { Filters, PaginatedResponse, Puppy, SharedData } from '@/types';
import { usePage } from '@inertiajs/react';
import { useRef } from 'react';

export default function App({ puppies, likedPuppies, filters }: { puppies: PaginatedResponse<Puppy>, likedPuppies:Puppy[], filters:Filters }) {
    const { auth } = usePage<SharedData>( ).props;
    const mainRef = useRef<HTMLElement>(null);
    return (
        <PageWrapper>
            <Container>
                <Header />
                <main ref={mainRef} className="scroll-mt-6">
                    <div className="mt-24 grid gap-8 sm:grid-cols90-2">
                        <Search filters={filters} />
                        {auth.user  && <Shortlist puppies={likedPuppies} />}
                    </div>
                    <PuppiesList puppies={puppies} />
                    {auth.user  && <NewPuppyForm mainRef={mainRef} />}
                </main>
            </Container>
        </PageWrapper>
    );
}

