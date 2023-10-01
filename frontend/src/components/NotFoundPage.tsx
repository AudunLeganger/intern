import { useTitle } from "modules/core/title/PageTitle.js"
import React from "react"
import { Link } from "react-router-dom"
import { homeUrl } from "utils/urls.js"

export function NotFoundPage() {
  useTitle("Ukjent side")

  return (
    <p>
      <Link to={homeUrl()}>Gå til forsiden</Link>
    </p>
  )
}
