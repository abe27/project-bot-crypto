import React, { useEffect, useState } from 'react'
import { Authenticated } from '@/Layouts'
import {
  Breadcrumbs,
  Header,
  Skeletons,
  SubBreadcrumbs,
  TopRefreshAndBacks,
} from '@/Components'

const Trend = (props) => {
  const [reloadData, setReloadData] = useState(false)

  const reload = () => {
    setReloadData(true)
    setTimeout(() => setReloadData(false), 3500)
  }

  useEffect(() => {
    reload()
  }, [])

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={<Breadcrumbs breadcrumbs={props.breadcrumbs} />}
    >
      <Header title={props.title} description={props.description} />
      {/* Page title starts */}
      <div className="">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="my-6 lg:my-2 container mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
            <div>
              <SubBreadcrumbs dateTimeFromServer={props.on_date} />
            </div>
            <div className="mt-6 lg:mt-0">
              <TopRefreshAndBacks isLoadingRefresh={reloadData} reload={reload} />
            </div>
          </div>
          {/* Page title ends */}
          <div className="container mx-auto">
            <div className="w-full rounded">
              <Skeletons />
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

export default Trend
