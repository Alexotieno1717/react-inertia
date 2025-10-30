import { PageWrapper } from "@/components/PageWrapper";
import { Container } from "@/components/Container";
import { Header } from "@/components/Header";
import { Search } from "@/components/Search";
import { Shortlist } from "@/components/Shortlist";
import { PuppiesList } from "@/components/PuppiesList";
import { NewPuppyForm } from "@/components/NewPuppyForm";

import { useState } from "react";
import { Filters, PaginatedResponse, Puppy, SharedData } from '@/types';
import { usePage } from '@inertiajs/react';

export default function App({ puppies, filters }: { puppies: PaginatedResponse<Puppy>, filters:Filters }) {
    return (
        <PageWrapper>
            <Container>
                <Header />
                <Main paginatedPuppies={puppies} filters={filters} />
            </Container>
        </PageWrapper>
    );
}


function Main({paginatedPuppies, filters}: {paginatedPuppies:PaginatedResponse<Puppy>, filters: Filters}) {
    const [puppies, setPuppies] = useState<Puppy[]>(paginatedPuppies.data);
    const { auth } = usePage<SharedData>( ).props;

    return (
        <main>
            <div className="mt-24 grid gap-8 sm:grid-cols90-2">
                <Search filters={filters} />
                {auth.user  && <Shortlist puppies={paginatedPuppies.data} />}
            </div>
            <PuppiesList puppies={paginatedPuppies} />
            <NewPuppyForm puppies={paginatedPuppies.data} setPuppies={setPuppies} />
        </main>
    );
}
